import transaksiList from '../data/transaksi-list'
// import firebase from './firebase'

// const db = firebase.firestore().collection('transaksi')

const transaksiApi = {
	getTransaksi: async(filter) => {
		if(filter == 0 || filter == ''){
			return await axios.get('/api/keuangan/get?with=kategori,dompet')
		} else {
			return await axios.get('/api/keuangan/get', {
				params: filter
			})
		}
	},
	getCurrentFilter: async(filter) => {
		return await axios.get('/api/keuangan/getCurrentFilter')
	},
	getDataFilter: async(filter) => {
		return await axios.get('/api/keuangan/getDataFilter', {
			params: filter
		})
	},
	addTransaksi: async(data) => {
		return await axios.post('/api/keuangan/addTransaksi', data)
	},
	updateTransaksi: async(data) => {
		return await axios.post(`/api/keuangan/updateTransaksi/${data.id}`, data)
	},
	hapusTransaksi: async(id) => {
		return await axios.delete(`/api/keuangan/deleteTransaksi/${id}`)
	},
	addTransfer: async(data) => {
		return await axios.post('/api/keuangan/addTransfer', data)
	},
	updateTransfer: async(data) => {
		return await axios.post(`/api/keuangan/updateTransfer/${data.id}`, data)
	},
	hapusTransfer: async(id) => {
		return await axios.delete(`/api/keuangan/deleteTransfer/${id}`)
	}
	// getTransaksi: async() => {
	// 	const documents = await db.get()
	// 	return documents.docs.map(doc => {
	// 		return {
	// 			...doc.data(),
	// 			id: doc.id
	// 		}
	// 		// transaksi list yg diimport gak isi id 1 2 3 kayak tadi.

	// 	})
	// },
	// addTransaksi: async(form) => {
	// 	const {id} =  await db.add(form)
	// 	return {...form, id}

	// },
	// getTransaksiById: async(id) => {
	// 	const document = await db.doc(id).get()
	// 	return {...document.data(), id}
	// },
	// updateTransaksi: async(form) => {
	// 	return await db.doc(form.id).update(form)
	// },
	// deleteTransaksi: async(id) => {
	// 	return await db.doc(id).delete()
	// },
}

export default transaksiApi