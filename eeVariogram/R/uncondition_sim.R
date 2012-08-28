uncondition_sim <-
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

