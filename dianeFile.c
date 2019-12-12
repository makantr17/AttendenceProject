#! /usr/bin/env bash
ADRESS_BOOK="adress_book.txt";
adresser() {
printf "Welcome to Adress Book\n"
printf "Chose 1 of 3 options:\n"
printf "1) Add record\n"
printf "2) Search record\n"
printf "3) Remove record\n"
printf "0) Exit\n"
create_file
read -r input_number
if [[ $input_number == "1" ]]; then
printf "Input name of the record:\n"
read -r input_name
printf "\nInput cellphone number of the record:\n"
read -r input_number
add_record $input_name $input_number
adresser
fi
if [[ $input_number == "2" ]]; then
printf "Input any info of the record:\n"
read -r input_value
search_for_record $input_value
adresser
fi
if [[ $input_number == "3" ]]; then
printf "\nInput ID of the record:\n"
cat $ADRESS_BOOK
read -r input_value
remove_record $input_value
adresser
fi
if [[ $input_number == "0" ]]; then
exit
fi
}
create_file() {
if [[ ! -f $ADRESS_BOOK ]]; then
touch $ADRESS_BOOK
printf "ID NAME NUMBER\n" > $ADRESS_BOOK
fi
}
## add record
add_record() {
if ! [[ "$2" =~ ^[0-9]+$ ]]; then
printf "That is not a phone number\n"
adresser
fi
id=$(cat $ADRESS_BOOK | wc -l)
n=$(grep -w $id. $ADRESS_BOOK)
while [[ $n != "0" && $n != '' ]]; do
id=$((id+1))
n=$(grep $id $ADRESS_BOOK)
done
printf "$id. $1 $2\n" >> $ADRESS_BOOK
}
## search for a record
search_for_record() {
head -n 1 $ADRESS_BOOK && grep $1 $ADRESS_BOOK
printf "\n"
}
## remove record
remove_record() {
command="grep $1 $ADRESS_BOOK"
n=$($command | wc -l)
if [[ $n != "1" || $n == "0" ]]; then
$command
fi
sed -i "/^$1./d" $ADRESS_BOOK
}
adresser