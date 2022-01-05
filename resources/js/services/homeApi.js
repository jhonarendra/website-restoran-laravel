import axios from "axios"

const homeApi = {
	getDataDashboard: async(filter) => {
		if(filter == 0 || filter == ''){
			return await axios.get('/api/keuangan/getDataDashboard')
		} else {
			return await axios.get('/api/keuangan/getDataDashboard', {
				params: filter
			})
		}
	},
	sinkronData: async(data) => {
		return await axios.post('/api/keuangan/sinkronData', data)
	},
	getDataSinkron: async() => {
		return await axios.get('/api/keuangan/getDataSinkron')
	},
	getIconDompet: async() => {
		return await axios.get('/api/keuangan/getIconDompet')
	},
	getIconKategori: async() => {
		return await axios.get('/api/keuangan/getIconKategori')
	},
	getColor: async() => {
		return await axios.get('/api/keuangan/getColor')
	}
}

export default homeApi