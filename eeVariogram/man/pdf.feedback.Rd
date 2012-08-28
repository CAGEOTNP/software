\name{pdf.feedback}
\alias{pdf.feedback}
%- Also NEED an '\alias' for EACH other topic documented here.
\title{Function for feedback the pdf}
\description{
%%  ~~ A concise (1-5 lines) description of what the function does. ~~
}
\usage{
pdf.feedback(Distribution, par1, par2, lsq, sig.fig = 3)
}
%- maybe also 'usage' for other objects documented here.
\arguments{
  \item{Distribution}{
%%     ~~Describe \code{Distribution} here~~
}
  \item{par1}{
%%     ~~Describe \code{par1} here~~
}
  \item{par2}{
%%     ~~Describe \code{par2} here~~
}
  \item{lsq}{
%%     ~~Describe \code{lsq} here~~
}
  \item{sig.fig}{
%%     ~~Describe \code{sig.fig} here~~
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
function (Distribution, par1, par2, lsq, sig.fig = 3){
if (Distribution == "Normal"){
Lo = qnorm(0.0001, par1, par2)
Up = qnorm(0.9999, par1, par2)
  }else{
if (Distribution == "Lognormal"){
Lo = qlnorm(0.0001, par1, par2)
Up = qlnorm(0.9999, par1, par2)}
  }
x<-seq(from=Up,to=Lo,length=102)[2:101]
 fq1    = 0.25
 fq2    = 0.75
 median = 0.5

 if (Distribution == "Normal"){
  f.normal<-dnorm(x, par1, par2)
  q1      <-qnorm(fq1, par1, par2)
  q2      <-qnorm(fq2, par1, par2)
  med     <-qnorm(median, par1, par2)
  fb      = list(f.normal, q1, q2, med)
  return (fb)
  }else{

 if (Distribution == "Lognormal"){
  f.lognormal<-dlnorm(x, par1, par2)
  q1         <-qlnorm(fq1, par1, par2)
  q2         <-qlnorm(fq2, par1, par2)
  med        <-qlnorm(median, par1, par2)
  fb         = list(f.lognormal, q1, q2, med)
  return (fb)
 }
  }
  }
}
% Add one or more standard keywords, see file 'KEYWORDS' in the
% R documentation directory.
\keyword{ ~kwd1 }
\keyword{ ~kwd2 }% __ONLY ONE__ keyword per line
