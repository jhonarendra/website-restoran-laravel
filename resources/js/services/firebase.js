import firebase from 'firebase/app'
import 'firebase/firestore'
var alphabet = [
	'A','B','C','D','E','F',
	'G','H','I','J','K','L',
	'M','N','O','P','Q','R',
	'S','T','U','V','W','X',
	'Y','Z',
	'a','b','c','d','e','f',
	'g','h','i','j','k','l',
	'm','n','o','p','q','r',
	's','t','u','v','w','x',
	'y','z',
	'1','2','3','4','5',
	'6','7','8','9','0',
	'.',',',':','-'
]
var shift = 37
function decrypt(data){
	let reverse_shift = (alphabet.length - shift) % alphabet.length
	return [... data].map(char =>
		setChar(char, reverse_shift)).join('')
}
function setChar(char, shift){
	let include = alphabet.includes(char)
	if(include){
		let position = alphabet.indexOf(char)
		let new_position = (position+shift) % alphabet.length
		return alphabet[new_position]
	} else {
		return char
	}
}
var firebaseConfig = {
	apiKey: decrypt("text"),
	authDomain: decrypt("text"),
	projectId: decrypt("text"),
	storageBucket: decrypt("text"),
	messagingSenderId: decrypt("text"),
	appId: decrypt("text")
}
firebase.initializeApp(firebaseConfig);

export default firebase