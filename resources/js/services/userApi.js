const userApi = {
	getUserLogin: async() => {
		return await axios.get('/api/user/getUserLogin')
	},
	setInitialData: async() => {
		return await axios.get('/api/user/setInitialData')
	}
}

export default userApi