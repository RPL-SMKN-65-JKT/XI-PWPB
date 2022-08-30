const str = 'saya sedang belajar javascript';

console.log(str.lastIndexOf('a')); // 23 :: ... belajar jav(a)script
console.log(str.lastIndexOf('ja')); // 20 :: ... belajar (ja)vascript
console.log(str.lastIndexOf('ja', 19)); // 16 :: ... bela(ja)r javascript