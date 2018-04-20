#include<iostream>
#include"QueueByStack.h"
#include"SqStack.h"
using namespace std;


int main()
{
	SqStack st(10);
	st.push(2);
	st.push(3);
	st.push(5);
	st.display();
	
	getchar();
	return 0;
}