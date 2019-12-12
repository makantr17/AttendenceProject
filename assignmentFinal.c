// C++ program to demonstrate creating processes using fork() 
#include<stdio.h> 
#include<stdlib.h> 
#include<sys/wait.h> 
#include<unistd.h> 

int main() 
{ 
    int n=2;

    for(int i=0;i<n;i++) // loop will run n times (n=5) 
    { 
        if(fork() == 0) 
        { 
            printf("Hello child pid %d from [parent] pid %d\n",getpid(),getppid()); 
            exit(0); 
        } 
        
    } 
    for(int i=0;i<n;i++) // loop will run n times (n=5) 
    wait(NULL); 
      
} 


// Requirements: 
// 1. Take the number of child processes as an argument when the parent process 
// creates child processes. This argument should be passed through a command line argument. 
// 2. The parent process creates child processes and should print out an error message if 
// creation fails. The parent process should also wait for all child processes to 
// finish and then exit. 
// 3. Each child process should print out a hello message together its PID and then exit. 
// 4. Test with 2, 4, and 8 child processes. 


// 5. Next, instead of creating multiple child processes of a parent process, 
// you are asked to create a chain of processes. That is to say, the parent process 
// will create one child and wait for it to finish, while the child creates its own
//  child and wait for it as well, and so on. The last child created should print out
//   the message and exit immediately so that its ancestors can finish too. Test your
//    program with 2, 4, and 8 child processes again. 
// 6. Develop a Makefile, to automate the compilation process. 
// 7. Develop a shell script to automate the test process, i.e. to test
//  with 2, 4, and 8 children processes for both versions of program automatically with this script. 
