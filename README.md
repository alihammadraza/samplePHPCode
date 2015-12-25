This code contains two main exercises:
1) the gps folder contains classes in form of services and entities that do the following
	a) calculates distance between two gps coordinates 
	b) uses the json encoded data file gistfile1.txt to calculate and filter customers within a specified
	distance from a gps coordinate.
2) the flatten folder contains classes in form of services and entities that do the following
	a) takes any nested array and flattens it to a single dimension.


You can use the index.php to quickly view the execution of both exercises.

I have tried to keep the code very atomic, emphasizing on reuse and interoperability e.g. you can use the object
from distanceBetweenTwoGPSPoints class to deduce distance between 2 gpsPoints.
customersLivingWithinASpecifiedDistance uses the aforementioned and compares the data from json file to filter users
living with a specified area. gpsPoint entity class makes a sanitized entity/object of gpsPoint which is later used as a
standard dataType for few methods of classes distanceBetweenTwoGPSPoints and customersLivingWithinASpecifiedDistance.

The phpunit tests are not very exhaustive because I think I have already spent plenty of time to prove my worth and this 
should be sufficient material to test my abilities.

For anything else please contact me on alihammad@gmail.com .