

function calculateAge(Dob){
    var month = [ 31, 28, 31, 30, 31, 30, 31,
        31, 30, 31, 30, 31 ];
var birth_date = Dob.getDate();
var birth_month = Dob.getMonth();
var birth_year = Dob.getYear();
cd = new Date();
var current_date = cd.getDate();
var current_month = cd.getMonth();
var current_year = cd.getYear();

// if birth date is greater then current
// birth_month, then donot count this month
// and add 30 to the date so as to subtract
// the date and get the remaining days
if (birth_date > current_date) {
current_month = current_month - 1;
current_date = current_date + month[birth_month.month - 1];
}

// if birth month exceeds current month,
// then do not count this year and add
// 12 to the month so that we can subtract
// and find out the difference
if (birth_month > current_month) {
current_year = current_year - 1;
current_month = current_month + 12;
}

// calculate date, month, year
var calculated_date = current_date - birth_date;
var calculated_month = current_month - birth_month;
var calculated_year = current_year - birth_year;

// print the present age
return ( calculated_year + " Tahun " +
 calculated_month + " Bulan "  +
calculated_date +" Hari ");
}

function getDayName(day) {
    let hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
    return hari[day];
}

function stringLike(value, filter) {
    console.log(value);
    return value.indexOf(filter)>-1;
}
