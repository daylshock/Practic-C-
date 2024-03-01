// readingTypes.cpp : Этот файл содержит функцию "main". Здесь начинается и заканчивается выполнение программы.
//

#include <iostream>
#include <string>
#include <sstream>

bool isInt(const std::string& str)
{
	std::istringstream iss(str);
	int value;
	if (!(iss >> value && iss.eof()))
	{
		return false;
	}
	else
	{
		return true;
	}
}
bool isDouble(const std::string& str)
{
	std::istringstream iss(str);
	double value;
	
	size_t dotPos = str.find('.');
	if (dotPos != std::string::npos)
	{
		int decimalPointPos = static_cast<int>(dotPos);
		int countPoint = std::count(str.begin(), str.end(), '.');
		if ((decimalPointPos > 0 && decimalPointPos < str.length() - 1) && countPoint < 2) 
		{
			if (!(iss >> value && iss.eof()))
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		else
		{
			return false;
		}
	}
	else 
	{
		return false;
	}
}

bool isChar(const std::string& str)
{
	if (str.length() != 1) 
	{
		return false;
	}
	else 
	{
		return true;
	}
}

int main(void)
{
	std::string str;
	std::cout <<"Enter value: " << std::endl;
	if (std::cin >> std::noskipws >> str) {
		std::cout <<"isInt?: " << isInt(str) << std::endl;
		std::cout << "isDob?: " << isDouble(str) << std::endl;

		std::cout << "isChar?: " << isChar(str) << std::endl;
	}else
	{
		std::cout << "Invaild!";
	}
	return 0;
}

// Запуск программы: CTRL+F5 или меню "Отладка" > "Запуск без отладки"
// Отладка программы: F5 или меню "Отладка" > "Запустить отладку"

// Советы по началу работы 
//   1. В окне обозревателя решений можно добавлять файлы и управлять ими.
//   2. В окне Team Explorer можно подключиться к системе управления версиями.
//   3. В окне "Выходные данные" можно просматривать выходные данные сборки и другие сообщения.
//   4. В окне "Список ошибок" можно просматривать ошибки.
//   5. Последовательно выберите пункты меню "Проект" > "Добавить новый элемент", чтобы создать файлы кода, или "Проект" > "Добавить существующий элемент", чтобы добавить в проект существующие файлы кода.
//   6. Чтобы снова открыть этот проект позже, выберите пункты меню "Файл" > "Открыть" > "Проект" и выберите SLN-файл.
