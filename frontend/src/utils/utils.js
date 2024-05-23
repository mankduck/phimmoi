import axios from 'axios'

export async function get(url = '') {
    try {
        const response = await axios.post(`http://127.0.0.1:8000/api/${url}`);
        return response.data;
    } catch (error) {
        console.error(error);
        return null;
    }
}


export async function add(url = '') {
    try {
        const response = await axios.post(`http://127.0.0.1:8000/api/${url}/store`);
        if (response.status === 201) {
            alert("Thêm thành công");
            // await getNhomTk();
        }
    } catch (error) {
        console.error(error);
    }
}