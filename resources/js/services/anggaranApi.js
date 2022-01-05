const anggaranApi = {
	getKategoriWithAnggaran: async(filter) => {
		if(filter == 0 || filter == ''){
			return await axios.get('/api/keuangan/getKategoriWithAnggaran')
		} else {
			return await axios.get('/api/keuangan/getKategoriWithAnggaran', {
				params: filter
			})
		}
	},
	getAnggaran: async() => {
		return await axios.get('/api/anggaran/get')
	},
	addAnggaran: async(data) => {
		return await axios.post('/api/anggaran/addAnggaran', data)
	},
	updateAnggaran: async(data) => {
		return await axios.post(`/api/anggaran/updateAnggaran/${data.idAnggaran}`, data)
	},
	hapusAnggaran: async(id) => {
		return await axios.delete(`/api/anggaran/deleteAnggaran/${id}`)
	},
}

export default anggaranApi