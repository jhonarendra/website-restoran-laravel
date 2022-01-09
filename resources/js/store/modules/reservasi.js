const state = {
	reservasi: [],
	tableViewReservasi: 'table'
}

const mutations = {
	setReservasi (state, data){
		state.reservasi = data
	},
	setTableViewReservasi (state, data) {
		state.tableViewReservasi = data
	}
}

const actions = {
	async fetchReservasi(){
		return {
			data: {
				status: true,
				data: [],
				message: ''
			}
		}
	}
}

export default {
	state,
	mutations,
	actions,
}