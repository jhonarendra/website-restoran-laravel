const dompetApi = {
	getDataDompet: async() => {
		return await axios.get('/api/dompet/get')
	},
	addDompet: async(data) => {
		return await axios.post('/api/dompet/addDompet', data)
	},
	updateDompet: async(data) => {
		return await axios.post(`/api/dompet/updateDompet/${data.id}`, data)
	},
	hapusDompet: async(id) => {
		return await axios.delete(`/api/dompet/deleteDompet/${id}`)
	},
}

export default dompetApi