#include <stdio.h>

typedef struct {
	int english;
	int chinese;
} score;

score getScore(){
	score s;
	s.english = 60;
	s.chinese = 80;
	return s;
}

int main(int argc, char** argv) 
{
	score stu = getScore();
	printf("Ó¢Óï³É¼¨£º%d,ÓïÎÄ³É¼¨£º%d",stu.english,stu.chinese);
	return 0;
}