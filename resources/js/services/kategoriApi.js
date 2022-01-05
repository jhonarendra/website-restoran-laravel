const kategoriApi = {
	getDataKategori: async() => {
		return await axios.get('/api/kategori/get')
	},
	addKategori: async(data) => {
		return await axios.post('/api/kategori/addKategori', data)
	},
	updateKategori: async(data) => {
		return await axios.post(`/api/kategori/updateKategori/${data.id}`, data)
	},
	hapusKategori: async(id) => {
		return await axios.delete(`/api/kategori/deleteKategori/${id}`)
	},
}

export default kategoriApi