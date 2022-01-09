export default {
  dateFormat: (date, type = 'd m Y h:i') => {
    const dateInput = (date === 'now') ? new Date() : new Date(date)
    let formattedDate = ''
    switch (type) {
      case 'd m Y':
        formattedDate = dateInput.toLocaleDateString('id', { year: 'numeric', month: 'long', day: 'numeric' })
        break
      case 'd m Y h:i':
        formattedDate = dateInput.toLocaleDateString('id', { year: 'numeric', month: 'long', day: 'numeric' })
        formattedDate += ' ' + dateInput.getHours().toString().padStart(2, '0') + ':' + dateInput.getMinutes().toString().padStart(2, '0')
        break
      case 'm d, Y':
        formattedDate = dateInput.toLocaleDateString('en', { year: 'numeric', month: 'long', day: 'numeric' })
        break
      case 'm d':
        formattedDate = dateInput.toLocaleDateString('en', { month: 'long', day: 'numeric' })
        break
      case 'm Y':
        formattedDate = dateInput.toLocaleDateString('en', { year: 'numeric', month: 'long' })
        break
      case 'm-short d':
        formattedDate = dateInput.toLocaleDateString('en', { month: 'short', day: 'numeric' })
        break
      case 'm-short Y':
        formattedDate = dateInput.toLocaleDateString('en', { year: 'numeric', month: 'short' })
        break
      case 'd-numeric':
        formattedDate = dateInput.toLocaleDateString('en', { day: 'numeric' })
        break
      case 'm-numeric':
        formattedDate = dateInput.toLocaleDateString('en', { month: 'numeric' })
        break
      case 'm-long':
        formattedDate = dateInput.toLocaleDateString('en', { month: 'long' })
        break
      case 'h:i':
        formattedDate = dateInput.getHours().toString().padStart(2, '0') + ':' + dateInput.getMinutes().toString().padStart(2, '0')
        break
      case 'Y':
        formattedDate = dateInput.toLocaleDateString('en', { year: 'numeric' })
        break
      case 'object':
        formattedDate = {
          year: dateInput.getFullYear().toString().padStart(4, '0'),
          month: dateInput.toLocaleDateString('en', { month: 'long' }),
          monthIndex: (dateInput.getMonth() + 1).toString().padStart(2, '0'),
          day: dateInput.getDate().toString().padStart(2, '0'),
          dayString: '',
          hour: dateInput.getHours().toString().padStart(2, '0'),
          minute: dateInput.getMinutes().toString().padStart(2, '0'),
          second: dateInput.getSeconds().toString().padStart(2, '0')
        }
        break
      case 'datetime':
        formattedDate = dateInput.getFullYear().toString().padStart(4, '0') + '-' +
        (dateInput.getMonth() + 1).toString().padStart(2, '0') + '-' +
        dateInput.getDate().toString().padStart(2, '0') + 'T' +
        dateInput.getHours().toString().padStart(2, '0') + ':' +
        dateInput.getMinutes().toString().padStart(2, '0') + ':' +
        dateInput.getSeconds().toString().padStart(2, '0')
        break
    }
    return formattedDate
  }
}
