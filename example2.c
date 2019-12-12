// // C++ program to demonstrate creating processes using fork() 
#include<stdio.h> 
#include<stdlib.h> 
#include<sys/wait.h> 
#include<unistd.h> 

// int main ()
// {
//       int pid, pid2;
//       printf ("\nI'm the original process with PID %d and PPID %d.\n\n", getpid (), getppid ());
        
 
//        int n= 1;

//     for(int i=0;i<n;i++) // loop will run n times (n=5) 
//     { 
//          pid = fork ();
//                             /* Duplicate process. Child and parent continue from here */
//         if (pid != 0)                         /* pid is non-zero, so I must be the parent */
//           {
//             printf ("Hello [parent] process with PID %d and PPID %d.\n",getpid (), getppid ());
//             printf ("My [child's] PID is %d\n", pid);
//           }
//         else                       /* pid is zero, so I must be the child */
//           {
//             printf ("Hello Iam [child] process with PID %d and PPID %d.\n",getpid (), getppid ());
//             int valus = getpid();
//             pid2= fork();     
//             printf ("I'm the [child's] %d  [child] with PID %d and PPID %d.\n",valus, getpid (), getppid ()); 
//             exit(0);  
//           }
//           printf ("PID %d terminates.\n", getpid () );
        
//     }
//     printf ("PID %d terminates.\n", getpid () );
//       for(int i=0;i<n;i++) // loop will run n times (n=5) 
//     wait(NULL); 
// }

// #include <stdio.h>

int main() { 
  char arr[] = {'a', 'b', 'c', 'd', 'e'}; 
  char cmd[2074] = {0}; // change this for more length
  char *base = "bash a.sh "; // note trailine ' ' (space) 
  sprintf(cmd, "%s", base);
  int i;
  for (i=0;i<sizeof(arr)/sizeof(arr[0]);i++) {
    sprintf(cmd, "%s%c ", cmd, arr[i]); 
  }
  system(cmd);
}