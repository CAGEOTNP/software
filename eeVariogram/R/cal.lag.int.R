cal.lag.int <-
function(area){ 
 x = area@bbox[1,]
 y = area@bbox[2,]
 D = sqrt((max(x) - min(x))^2 + (max(y) - min(y))^2)
 Diag = D 
 k_int = 0
 while (Diag>=1){
  k_int = k_int + 1
  Diag = Diag%/%10
 }
 if (k_int >0){ 
  int.D = D%/%(10^(k_int-1))
  flo.D = (D%/%(10^(k_int-2)))/10
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
   int.D = (D*10^k_int)%/%1
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

