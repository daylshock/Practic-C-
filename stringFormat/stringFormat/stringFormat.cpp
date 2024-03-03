#include <iostream>
#include <time.h>
#include <random>
#include <math.h>
struct MyStruct
{
public:
	void setValue(int& Y_MIN, int& Y_MAX, int& K_MIN, int& K_MAX , unsigned int& COUNT)
	{
		this->Y_MAX = Y_MAX;
		this->Y_MIN = Y_MIN;
		this->K_MIN = K_MIN;
		this->K_MAX = K_MAX;
		this->COUNT = COUNT;
	}
	void randEquation(MyStruct*);
private:
	int Y_MIN, Y_MAX, K_MIN, K_MAX;
	unsigned int COUNT;
}mystruct_t;

void MyStruct::randEquation(MyStruct* mystruct_t)
{
	srand(std::time(NULL));
	int Y_VAR = rand() % ( - mystruct_t->Y_MAX + 1) + mystruct_t->Y_MIN;
	int K_VAR = rand() % ( - mystruct_t->K_MAX + 1) + mystruct_t->K_MIN;
	 
	for (int i = 0; i < mystruct_t->COUNT; ++i) 
	{
		int C_VAR = std::rand() % 19 + 1;
		float RESULT = float((Y_VAR / K_VAR) - (C_VAR / K_VAR));
		std::cout << " " << Y_VAR << " = " << K_VAR << " * X + " << C_VAR << std::endl;
		std::cout << " (" << Y_VAR << " " << K_VAR << " " << C_VAR << ")"<<" RESULT => " << RESULT<< std::endl;
		Y_VAR += std::rand() % (mystruct_t->Y_MAX - mystruct_t->Y_MIN + 1) + mystruct_t->Y_MIN;
		K_VAR += std::rand() % (mystruct_t->K_MAX - mystruct_t->K_MIN + 1) + mystruct_t->K_MIN;
	}
}

int		MIN_Y = 0,
		MAX_Y = 0,
		MIN_K = 0,
		MAX_K = 0; 

unsigned int COUNT = 0;

int main(void)
{
	std::cout << "Welcome!\n";
	std::cout << "Enter the number of equations: \n";
	while (!(std::cin >> COUNT)) 
	{
		std::cout << "Bad value!\n";
		std::cin.clear();
		std::cin.ignore(std::numeric_limits<std::streamsize>::max(), '\n');
	}
	std::cout << "Enter the max and min value of the coefficients(min Y, max Y, min K, max K): \n";
	std::cin >> MIN_Y >> MAX_Y >> MIN_K >> MAX_K;
	mystruct_t.setValue(MIN_Y, MAX_Y, MIN_K, MAX_K, COUNT);
	std::cout << "Random linear equation: " << std::endl;
	mystruct_t.randEquation(&mystruct_t);
	return 0;
}