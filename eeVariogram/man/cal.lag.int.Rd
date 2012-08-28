\name{cal.lag.int}
\alias{cal.lag.int}
%- Also NEED an '\alias' for EACH other topic documented here.
\title{Function to calculate lag intervals}
\description{
%%  ~~ A concise (1-5 lines) description of what the function does. ~~
}
\usage{
cal.lag.int(area)
}
%- maybe also 'usage' for other objects documented here.
\arguments{
  \item{area}{
%%     ~~Describe \code{area} here~~
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
function(area){ 
 x = area@bbox[1,]
 y = area@bbox[2,]
 D = sqrt((max(x) - min(x))^2 + (max(y) - min(y))^2)
 Diag = D 
 k_int = 0
 while (Diag>=1){
  k_int = k_int + 1
  Diag = Diag\%/\%10
 }
 if (k_int >0){ 
  int.D = D\%/\%(10^(k_int-1))
  flo.D = (D\%/\%(10^(k_int-2)))/10
  if (flo.D < 1.5) {
   int.D = 1 
   D.round = int.D*10^(k_int-1)
   lag1 = D.round*0.5
   lag2 = lag1*0.4
   lag3 = lag2*0.5
   lag4 = lag3*0.5
   lag5 = lag4*0.4
   lag6 = lag5*0.5
   lag7 = lag6*0.4 
   } 
  if ((1.5 <= flo.D) & (flo.D < 3.5)) {
   int.D = 2
   D.round = int.D*10^(k_int-1)
   lag1 = D.round*0.5
   lag2 = lag1*0.5
   lag3 = lag2*0.4
   lag4 = lag3*0.5
   lag5 = lag4*0.5
   lag6 = lag5*0.4
   lag7 = lag6*0.5 
  }
  if ((3.5 <= flo.D) & (flo.D < 7.5)) {
   int.D = 5
   D.round = int.D*10^(k_int-1)
   lag1 = D.round*0.4
   lag2 = lag1*0.5
   lag3 = lag2*0.5
   lag4 = lag3*0.4
   lag5 = lag4*0.5
   lag6 = lag5*0.5
   lag7 = lag6*0.4 
  }
  if (flo.D >= 7.5) {
   int.D = 10
   D.round = int.D*10^(k_int-1)
   lag1 = D.round*0.5
   lag2 = lag1*0.4
   lag3 = lag2*0.5
   lag4 = lag3*0.5
   lag5 = lag4*0.4
   lag6 = lag5*0.5
   lag7 = lag6*0.5 
  }
 }
 if (k_int<=0){ 
  int.D = 0
  while (int.D<=0){
   k_int = k_int + 1
   int.D = (D*10^k_int)\%/\%1
  }
  flo.D = (trunc(D*10^(k_int+1)))/10
  if (flo.D < 1.5) {
   int.D = 1 
   D.round = int.D/(10^k_int)
   lag1 = D.round*0.5
   lag2 = lag1*0.4
   lag3 = lag2*0.5
   lag4 = lag3*0.5
   lag5 = lag4*0.4
   lag6 = lag5*0.5
   lag7 = lag6*0.4 
   } 
  if ((1.5 <= flo.D) & (flo.D < 3.5)) {
   int.D = 2
   D.round = int.D/(10^k_int)
   lag1 = D.round*0.5
   lag2 = lag1*0.5
   lag3 = lag2*0.4
   lag4 = lag3*0.5
   lag5 = lag4*0.5
   lag6 = lag5*0.4
   lag7 = lag6*0.5 
  }
  if ((3.5 <= flo.D) & (flo.D < 7.5)) {
   int.D = 5
   D.round = int.D/(10^k_int)
   lag1 = D.round*0.4
   lag2 = lag1*0.5
   lag3 = lag2*0.5
   lag4 = lag3*0.4
   lag5 = lag4*0.5
   lag6 = lag5*0.5
   lag7 = lag6*0.4 
  }
  if (flo.D >= 7.5) {
   int.D = 10
   D.round = int.D/(10^k_int)
   lag1 = D.round*0.5
   lag2 = lag1*0.4
   lag3 = lag2*0.5
   lag4 = lag3*0.5
   lag5 = lag4*0.4
   lag6 = lag5*0.5
   lag7 = lag6*0.5 
  }
 }
 lags = matrix(c(lag7, lag6, lag5, lag4, lag3, lag2, lag1), nrow = 7, ncol = 1)
 return(lags) 
  }
}
% Add one or more standard keywords, see file 'KEYWORDS' in the
% R documentation directory.
\keyword{ ~kwd1 }
\keyword{ ~kwd2 }% __ONLY ONE__ keyword per line
