#!/bin/bash

# We have created some functions that execute specified tasks for users
# addNewRecord
# displayTheRecord
# editTheRecord
# removeExistingRecord
# searchExistingRecord


# This function add the record to the file
addNewRecord()
{
	while true
	do
		echo "To add use format: \"Last name,first name,email url,phone number\" (no quotes or spaces)"
		echo "Example: Kante,Mamady,makante17@alustudent.com,626316977"

		read letterAinput
		if [ "$letterAinput" == 't' ]    #check to quit the program
			then
			break
		fi
		echo
		echo $letterAinput >> addressbook.txt
		echo "Record Added to address book."
		echo
	done
}


# This function display the records in the txt file
displayTheRecord()
{
	echo
	while true
	do
		echo "To display a record, enter the last name of the person (case sensitive)."
		read letterDinput
		if [ "$letterDinput" == 't' ]
			then
			break
		fi
		echo
		echo "Listing records for \"$letterDinput\":"
		grep ^"$letterDinput" addressbook.txt   # searching the lines by last name (the first field in the record)
		RETURNSTATUS=`echo $?`
		if [ $RETURNSTATUS -eq 1 ]
			then
			echo "No records found with last name of \"$letterletterDinput\"."
		fi
		echo
	done
}



# This function will remove the existing record indexed by user
removeExistingRecord()
{
	echo 
	while true
	do
		echo "To remove a record, enter any search string, e.g. last name or email address (case sensitive)."
		echo "If you're done, enter 't' to quit."
		read letterRinput
		if [ "$letterRinput" == 't' ]
			then
			break
		fi
		echo
		echo "Listing records for \"$letterRinput\":"
		grep -n "$letterRinput" addressbook.txt
		RETURNSTATUS=`echo $?`
		if [ $RETURNSTATUS -eq 1 ]
			then
			echo "No records found for \"$letterRinput\""
		else
			echo
			echo "Enter line number (first number of the entry) of the record you want to remove."
			read lineNumber
			for line in `grep -n "$letterRinput" addressbook.txt`
			do
				number=`echo "$line" | cut -c1`
				if [ $number -eq $lineNumber ]
					then
					lineRemove="${lineNumber}d"
					sed -i -e "$lineRemove" addressbook.txt
					echo "Record removed from the address book."
				fi
			done
		fi
		echo
	done
}



# This function allow us to edit the file according to user input
editTheRecord()
{
	echo
	while true
	do
		echo "To edit, enter any search string, e.g. last name or email address (case sensitive)."
		echo "After edit, enter 't' to quit."
		read letterEinput
		if [ "$letterEinput" == addressbook.txt ]
			then
			break
		fi
		echo
		echo "Listing records for \"$letterEinput\":"
		grep -n "$letterEinput" addressbook.txt
		RETURNSTATUS=`echo $?`
		if [ $RETURNSTATUS -eq 1 ]
			then
			echo "No records found for \"$letterEinput\""
		else
			echo
			echo "Enter the line number (the first number of the entry) that you'd like to edit."
			read lineNumber
			echo
			for line in `grep -n "$letterEinput" addressbook.txt`
			do
				number=`echo "$line" | cut -c1`
				if [ $number -eq $lineNumber ]
					then
                 	echo "Chose the option for any operation"
					echo "\"Last name,first name,email url,phone number\" (no quotes or spaces)."
					read edit
					lineChange="${lineNumber}s"
					sed -i -e "$lineChange/.*/$edit/" addressbook.txt
					echo
					echo "Change made."
				fi
			done
		fi
		echo
	done		
}


# THis function search the existing record from the txt file if exist it fetch and print it
searchExistingRecord()
{
	echo
	while true
	do
		echo "| Search any string by, e.g. last name or email address (case sensitive)."
		echo "| Format: \"Last name,firstname,email address,phone number\"."
		echo "| Example: Doe,John,johndoe@gmail.com,6501234567"
	
        # Get input and check is user require to terminate 't' or to search 'S'
		read letterSinput
		if [ "$letterSinput" == 't' ]
			then
			break
		fi
		echo
		echo "Listing records for \"$letterSinput\":"
		grep "$letterSinput" addressbook.txt
		RETURNSTATUS=`echo $?`
		if [ $RETURNSTATUS -eq 1 ]
			then
			echo "NO record \"$letterSinput\"."
		fi
		echo
	done
}


echo
# checking to make sure the .csv file ends with newline character
lastCharOfFile=`tail -c 1 addressbook.txt` 

if [ -n "$lastCharOfFile" ]
	then
	echo >> addressbook.txt
fi
echo "########################### Welcome to Kante Address Book #############################"
echo "Choose the following letter:"
echo "a  ------------Allow you to add a record"
echo "d  ------------Allow you to to display 1 or more records"
echo "e  ------------Allow you to edit a record"
echo "r  ------------Allow you to remove a single record"
echo "s  ------------Allow you to search for records"
echo "t  ------------Allow you to quit or terminate the program"
echo
read input

case $input in
	a) addNewRecord;;
	d) displayTheRecord;;
	e) editTheRecord;;
	r) removeExistingRecord;;
	s) searchExistingRecord;;
esac


echo
# HERE doc
cat <<EOF   

Thanks for using this address book and The chang were saved!
EOF
echo
