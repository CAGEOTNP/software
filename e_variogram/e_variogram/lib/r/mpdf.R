#getting input

args <- commandArgs(TRUE)
max <- as.numeric(args[1])
min <- as.numeric(args[2])
med <- as.numeric(args[3])
fq  <- as.numeric(args[4])
tq  <- as.numeric(args[5])

#------------------
library(sp)
library(gstat)
library(eeVariogram)

E.marg = pdf.fitting(min,max,fq,med,tq)

dist = E.marg$dist
pars1 = E.marg$pars[1]
pars2 = E.marg$pars[2]
lsq   = E.marg$lsq

write(dist, "") 
write(pars1, "")
write(pars2, "")
write(lsq, "")
