pdf.feedback <-
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

