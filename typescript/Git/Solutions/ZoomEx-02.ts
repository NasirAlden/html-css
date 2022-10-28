// 2) Given a strings of lowercase letters, we need to remove consecutive vowels from the
// string Node: Sentence should not contain two consecutive vowels (a, e, i, o, u).
// Input: your article is in queue
// Output: yor article is in qu
export {};
let str:string="your article is in queue";
               

let strArray=[...str];
str=""+strArray[0];
for(let i=1; i<strArray.length;++i){
    if("aeiou".indexOf(strArray[i-1])!==-1 && "aeiou".indexOf(strArray[i])!==-1){
    } 
    else{
        str+=strArray[i];
    }  
}

console.log(str);