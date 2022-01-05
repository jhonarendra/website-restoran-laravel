import userApi from '../../services/userApi'

const SET_USER_LOGIN = "SET_USER_LOGIN"
const SET_KEYDOWN_LISTENER = "SET_KEYDOWN_LISTENER"

const state = {
	userLogin: null,
	setKeyDownListener: false
}

const mutations = {
	[SET_USER_LOGIN](state, data){
		state.userLogin = data
	},
	[SET_KEYDOWN_LISTENER](state){
		state.setKeyDownListener = true
	}
}

const actions = {
	async fetchUserLogin({commit}){
		if(!localStorage.userLogin){
			return await userApi.getUserLogin()
			.then(res => {
				commit(SET_USER_LOGIN, res.data.data)
				localStorage.setItem('userLogin', JSON.stringify(res.data.data))
			})
			.catch(err => {
				console.log(err)
				alert(err)
			})
		} else {
			commit(SET_USER_LOGIN, JSON.parse(localStorage.userLogin))
		}
	},
	async setInitialData({commit}){
		console.log('user.jssetInitialData')
		return await userApi.setInitialData()
	},
	setKeyDown({commit}){
		commit(SET_KEYDOWN_LISTENER)
	}
}

const getters = {
	getUserLogin: state => {
		return state.userLogin
	},
	getKeyDownListener: state => {
		return state.setKeyDownListener
	}
}

export default {
	state,
	mutations,
	actions,
	getters
}