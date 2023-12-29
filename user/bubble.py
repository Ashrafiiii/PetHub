array=[5,6,2,9,25,46,24]
for i in range (0,len(array)):
	for j in range (0,len(array)-1):

		if array[j]>array[j+1]:
			x=array[j]
			array[j]=array[j+1]
			array[j+1]=x

		print(array[:])