#include<iostream>
using namespace std;

int main()
{
	int nAge = *(new int);
	float fHeight(1.78);
	int* nArray = new int[5];
	int** nDArray = new int*[3];
	for(int i=0;i<3;i++)
		nDArray[i] = new int[5];
	
	nDArray[0][0] = 11;
	
	nAge = 4;
	nArray[0] = 3; 
	
	cout<<nAge<<endl;
	cout<<fHeight<<endl;
	cout<<nArray[1]<<endl;
	cout<<nDArray[0][0]<<endl;
	
	
	delete &nAge;
	delete[] nArray;
	
	for(int i=0;i<3;i++)
		delete[] nDArray[i];
	delete[] nDArray;
	return 0;
} 