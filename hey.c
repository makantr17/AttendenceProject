
// #include <stdio.h>                
// #include <signal.h>
// #include <unistd.h>
// // https://stackoverflow.com/questions/26447258/c-program-how-to-get-childs-child-pid-in-a-parent-after-fork

// int main(){
    
//     fork();
//     fork();
//     __pid_t pid;
//     if (pid=fork() == 0){
//         printf("This is the child: %d\n", pid);
//     }
//     else if(pid=fork() > 0)
//     {
//         printf("This is the parent: %d\n", pid);
//     }
    
//     return 0;

// }


#include <stdio.h>
#include <string.h>

int main()
{
	char str1[] = "Look Here";
	char str2[] = "Look Here";
	char str3[] = "Look Here";
	char str4[] = "Look Her";

	if (strcmp(str1, "Look Here") == 0)
	{
		printf("THe same");
	}
	else{
		printf("not the same");
	}
	

	// printf("%d\n", strcmp(str1, str2));
	// printf("%d\n", strcmp(str2, str3));
	// printf("%d\n", strcmp(str3, str4));

	return 0;
}