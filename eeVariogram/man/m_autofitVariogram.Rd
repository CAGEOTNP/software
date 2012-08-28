\name{m_autofitVariogram}
\alias{m_autofitVariogram}
%- Also NEED an '\alias' for EACH other topic documented here.
\title{Function for fitting the variogram}
\description{
%%  ~~ A concise (1-5 lines) description of what the function does. ~~
}
\usage{
m_autofitVariogram(semivariance, input_data, model = c("Sph", "Exp", "Gau", "Ste", "Mat"), kappa = c(0.05, seq(0.2, 2, 0.1), 5, 10), GLS.model = NA, verbose = FALSE)
}
%- maybe also 'usage' for other objects documented here.
\arguments{
  \item{semivariance}{
%%     ~~Describe \code{semivariance} here~~
}
  \item{input_data}{
%%     ~~Describe \code{input_data} here~~
}
  \item{model}{
%%     ~~Describe \code{model} here~~
}
  \item{kappa}{
%%     ~~Describe \code{kappa} here~~
}
  \item{GLS.model}{
%%     ~~Describe \code{GLS.model} here~~
}
  \item{verbose}{
%%     ~~Describe \code{verbose} here~~
}
}
\details{
%%  ~~ If necessary, more details than the description above ~~
}
\value{
%%  ~Describe the value returned
%%  If it is a LIST, use
%%  \item{comp1 }{Description of 'comp1'}
%%  \item{comp2 }{Description of 'comp2'}
%% ...
}
\references{
%% ~put references to the literature/web site here ~
}
\author{
%%  ~~who you are~~
}
\note{
%%  ~~further notes~~
}

%% ~Make other sections like Warning with \section{Warning }{....} ~

\seealso{
%% ~~objects to See Also as \code{\link{help}}, ~~~
}
\examples{
##---- Should be DIRECTLY executable !! ----
##-- ==>  Define data, use random,
##--	or do  help(data=index)  for the standard data sets.

## The function is currently defined as
function(semivariance, input_data, model = c("Sph", "Exp", "Gau", "Ste", "Mat"), kappa = c(0.05, seq(0.2, 2, 0.1), 5, 10), GLS.model = NA, verbose = FALSE)
{
 x = input_data@bbox[1,]
 y = input_data@bbox[2,]
 experimental_variogram = semivariance

 # Automatically choosing the initial guess for fit.variogram
 # initial_sill = mean(max(semi_variance) + median(semi-varariance))
 # initial_range = 0.10 * central axis of the area.
 # initial_nugget = minimum semi-variance value
 initial_nugget = min(experimental_variogram$gamma)
 initial_range = (0.1*sqrt((max(x) - min(x))^2 + (max(y) - min(y))^2) )   
 initial_sill = mean(c(max(experimental_variogram$gamma), median(experimental_variogram$gamma)))

 # Determine nugget, range and sill to be automatically fitted
 fit_nugget = TRUE
 fit_range = TRUE
 fit_sill = TRUE

 getModel <- function(psill, model, range, kappa, nugget, fit_range, fit_sill, fit_nugget, verbose)
 {
  if(verbose) debug.level = 1 else debug.level = 0
  obj = try(fit.variogram(experimental_variogram,
        model = vgm(psill=psill, model=model, range=range,
        nugget=nugget,kappa = kappa),
        fit.ranges = c(fit_range), fit.sills = c(fit_nugget, fit_sill),
  debug.level = 0), TRUE)
  if("try-error" \%in\% class(obj)) {
  #print(traceback())
  warning("An error has occured during variogram fitting. Used:\n", 
  "\tnugget:\t", nugget, 
  "\n\tmodel:\t", model, 
  "\n\tpsill:\t", psill,
  "\n\trange:\t", range,
  "\n\tkappa:\t",ifelse(kappa == 0, NA, kappa),
  "\n  as initial guess. This particular variogram fit is not taken into account. \nGstat error:\n", obj)
  return(NULL)
  } else return(obj)
 }

 # Automatically testing different models, the one with the smallest sums-of-squares and not singular is chosen
 test_models = model
 SSerr_list = c()
 sing_list = c()
 vgm_list = list()
 counter = 1
 for(m in test_models) {
  if(m != "Mat" && m != "Ste") {        # If not Matern and not Stein
  model_fit = getModel(initial_sill - initial_nugget, m, initial_range, kappa = 0, initial_nugget, fit_range, fit_sill, fit_nugget, verbose = verbose)
  if(!is.null(model_fit)) {# skip models that failed
   vgm_list[[counter]] = model_fit
   SSerr_list = c(SSerr_list, attr(model_fit, "SSErr"))
   sing_list  = c(sing_list, attr(model_fit, "singular"))}
   counter = counter + 1
  } else {                 # Else loop also over kappa values
   for(k in kappa) {
    model_fit = getModel(initial_sill - initial_nugget, m, initial_range, k, initial_nugget, fit_range, fit_sill, fit_nugget, verbose = verbose)
    if(!is.null(model_fit)) {
    vgm_list[[counter]] = model_fit
    SSerr_list = c(SSerr_list, attr(model_fit, "SSErr"))
    sing_list  = c(sing_list, attr(model_fit, "singular"))}
    counter = counter + 1
   }
  }
 }
 # Check for negative values in sill or range coming from fit.variogram
 # and NULL values in vgm_list, and remove those with a warning
 strange_entries = sapply(vgm_list, function(v) any(c(v$psill, v$range) < 0) | is.null(v))
 if(any(strange_entries)) {
  if(verbose) {
   print(vgm_list[strange_entries])
   cat("^^^ ABOVE MODELS WERE REMOVED ^^^\n\n")
  }
  warning("Some models where removed for being either NULL or having a negative sill/range/nugget, \n\tset verbose == TRUE for more information")
  SSerr_list = SSerr_list[!strange_entries]
  vgm_list = vgm_list[!strange_entries]
  sing_list = sing_list[!strange_entries]
 }
 countertwo = 1
 prevgm_list = list()
 preSSerr_list = c()
 non_singular = which(!sing_list)
if (length(non_singular) != 0){
 for (n in non_singular){
 prevgm_list[[countertwo]] = vgm_list[[n]] #list of variogram with non_singular attribute.
 preSSerr_list = c(preSSerr_list, SSerr_list[n]) #list of error of fitting to non_singular variogram
 countertwo = countertwo + 1
 }
 if(verbose) {
  cat("Selected:\n")
  print(prevgm_list[[which.min(preSSerr_list)]])
  cat("\nTested models, best first:\n")
  tested = data.frame("Tested models" = sapply(vgm_list, function(x) as.character(x[2,1])), 
kappa = sapply(vgm_list, function(x) as.character(x[2,4])), 
"SSerror" = SSerr_list, "singular" = sing_list)
  tested = tested[order(tested$SSerror),]
  print(tested)
 }
 result = list(exp_var = experimental_variogram, var_model = prevgm_list[[which.min(preSSerr_list)]], sserr = min(preSSerr_list))
 class(result) = c("autofitVariogram","list")}else{ result = NULL }    
 return(result)
  }
}
% Add one or more standard keywords, see file 'KEYWORDS' in the
% R documentation directory.
\keyword{ ~kwd1 }
\keyword{ ~kwd2 }% __ONLY ONE__ keyword per line
