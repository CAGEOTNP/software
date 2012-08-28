\name{uncondition_sim}
\alias{uncondition_sim}
%- Also NEED an '\alias' for EACH other topic documented here.
\title{Function to do unconditional simulation}
\description{
%%  ~~ A concise (1-5 lines) description of what the function does. ~~
}
\usage{
uncondition_sim(mu, sigma, N, grid_map, vari_model)
}
%- maybe also 'usage' for other objects documented here.
\arguments{
  \item{mu}{
%%     ~~Describe \code{mu} here~~
}
  \item{sigma}{
%%     ~~Describe \code{sigma} here~~
}
  \item{N}{
%%     ~~Describe \code{N} here~~
}
  \item{grid_map}{
%%     ~~Describe \code{grid_map} here~~
}
  \item{vari_model}{
%%     ~~Describe \code{vari_model} here~~
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
function(mu, sigma, N, grid_map, vari_model)
{
 gridcord = coordinates(grid_map)
 vx = gridcord[,1] 
 X =sample(vx,1)
 for (i in 1:length(vx))
  if (gridcord[i,1] == X) Y = gridcord[i,2]
 names(Y) <- NULL
 in_sample = data.frame(x=X,y=Y,sample_value=rnorm(1,mean=mu,sd=sigma))
 coordinates(in_sample)=~x+y
 fsim = gstat(id=c("sample_value"),formula=sample_value~1,data=in_sample,beta=mu,nmax=24,model=vari_model,dummy=TRUE)
 unconditional_sim = predict.gstat(fsim,grid_map,nsim=N,BLUE=FALSE)
 return (unconditional_sim)
  }
}
% Add one or more standard keywords, see file 'KEYWORDS' in the
% R documentation directory.
\keyword{ ~kwd1 }
\keyword{ ~kwd2 }% __ONLY ONE__ keyword per line
