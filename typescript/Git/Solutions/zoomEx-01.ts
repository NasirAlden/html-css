
function reverseStr(str2: string) {
    return str2.split("").reverse().join("");
}

let str = "a,b$c";
let strRev=reverseStr(str);

function reverseSpecial(){
    let strLast="";
    for(let i=0,j=0;i<str.length;++i){
    if((/[a-zA-Z]/).test(str[i])!==true){
        strLast+= str[i];
    } 
    else{   //searching letters in the reversed string
        while((/[a-zA-Z]/).test(strRev[j])!==true){
            j++;
        }
        strLast+=strRev[j];
        j++;
    }
}
return strLast;
}
console.log("------------ Example 1 ---------------");
console.log("Origin String: "+str);
console.log("Regular Reverse: "+strRev);
console.log("Special Reverse: "+reverseSpecial());
console.log("");
console.log("------------ Example 2 ---------------");
str="Ab, c, de!$";
console.log("Origin String: "+str);
strRev=reverseStr(str);
console.log("Regular Reverse: "+strRev);
console.log("Special Reverse: "+reverseSpecial());


