// 4)	In JavaScript with are using the … operator over objects arrays and function, using this operator 
// a.	Clone array of numbers
// b.	Get array first and second elements
// c.	Get array first and second elements and the rest put them in one element
// d.	Define simple object of person and get the first name and last name using …
// e.	Define function that receive a and b elements and the rest of elements put them in args property. (Rest Parameter and Spread Operator).
export{};
console.log("-------------- Section a -----------------");
// a
let numArr=[2,4,5,6,7,8,8,9];
let cloneArr=[...numArr];
console.log(cloneArr);
console.log("-------------- Section b -----------------");
//b
let firstSecond=[[...numArr][0],[...numArr][1]];
console.log(firstSecond);

console.log("-------------- Section c -----------------");
//c
let lastArr=[];

let first, second, lastNums;
[first, second, ...lastNums] = numArr;
console.log(first,second,lastNums);
console.log("-------------- Section d -----------------");
//d
let person={
    fName:"David",
    lName:"Israel",
    age:28,
    id:22255566
}

let {fName,lName,...otherInfo}=person;
console.log(fName);
console.log(lName);
console.log("-------------- Section e -----------------");
//e
function addPerson2({ fName, lName,...rest}=person) {
  return {
    fName:fName,
    lName:lName,
    args:rest,
  };
}
let person2=addPerson2();
console.log(person2);
