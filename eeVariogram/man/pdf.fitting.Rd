\name{pdf.fitting}
\alias{pdf.fitting}
%- Also NEED an '\alias' for EACH other topic documented here.
\title{Fitting the pdf}
\description{
%%  ~~ A concise (1-5 lines) description of what the function does. ~~
}
\usage{
pdf.fitting(Lo, Up, l, m, u)
}
%- maybe also 'usage' for other objects documented here.
\arguments{
  \item{Lo}{
%%     ~~Describe \code{Lo} here~~
}
  \item{Up}{
%%     ~~Describe \code{Up} here~~
}
  \item{l}{
%%     ~~Describe \code{l} here~~
}
  \item{m}{
%%     ~~Describe \code{m} here~~
}
  \item{u}{
%%     ~~Describe \code{u} here~~
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
function(Lo, Up, l, m, u){

##########################*Calculate coefficient of skewness*#########################################################
 SK = abs((u+l-(2*m))/(u-l))

###########################*Fitting probability distribution*#########################################################

### Initial values for optimisation, based on normal approximation
 s<-qnorm(1-(0.5/2))# getting upper quartile of standard normal distribution (with mean=0 and std=1)
 v<-((u-l)/(2*s))^2 # initial with normal distribution assumption: Q3-Q1=2.s.sigma with s=0.6744898
 if (SK <= 0.5){

### Fit a normal distribution
  normalerror<-function(x,elicited,probabilities){
   a<-x[1]
   b<-exp(x[2])
   sum((pnorm(elicited,a,b)-probabilities)^2)
  }
  normalfit<-optim(c(m,0.5*log(v)),normalerror,elicited=c(Lo,l,m,u,Up),probabilities=c(0,0.25,0.5,0.75,1))
  normalparameters<-c(normalfit$par[1],exp(normalfit$par[2]))
  normallsq<-normalfit$value
  re = list (dist = "Normal",pars = normalparameters, lsq = normallsq)
  return(re)
 } else {

### Fit a log normal distribution
  lnormerror<-function(x,elicited,probabilities){
   a<-x[1]
   b<-exp(x[2])
  sum((plnorm(elicited,a,b)-probabilities)^2)
  }
  std<-((log(u)-log(l))/(2*s))
  lognormalfit<-optim(c(log(m),log(std)),lnormerror,elicited=c(Lo,l,m,u,Up),probabilities=c(0,0.25,0.5,0.75,1))
  lnormparameters<-lognormalfit$par
  lnormparameters[2]<-exp(lnormparameters[2])
  lognormallsq<-lognormalfit$value
  re = list (dist = "Lognormal", pars = lnormparameters, lsq = lognormallsq)
  return(re)
 }
  }
}
% Add one or more standard keywords, see file 'KEYWORDS' in the
% R documentation directory.
\keyword{ ~kwd1 }
\keyword{ ~kwd2 }% __ONLY ONE__ keyword per line
