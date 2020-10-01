#include <iostream>
using namespace std;
int main()
{
	int n,diff,c=0;
	cin>>n;
	int arr[n];

	for(int i=0;i<n;i++)
	{
		cin>>arr[i];
	}

	diff = arr[1] - arr[0];
	for(int i=0;i<n-1;i++)
	{
		if(arr[i+1] != (arr[i]+diff) )
		{
			cout<<arr[n-1];
			c++;
			break;
		}
	}

	//cout<<c<<endl;
 if(c==0)
 	cout<<(arr[n-1] + diff);


}	