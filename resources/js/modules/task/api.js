import axios from "axios";

const API_ENDPOINT = '/api/task';

export default {
    list(query) {
        return axios.get(`${API_ENDPOINT}` + serializeQuery({params: query}));
    },
    store(task) {
        return axios.post(`${API_ENDPOINT}`, task);
    },
    update(task) {
        return axios.put(`${API_ENDPOINT}/${task.id}`, task);
    },
    remove(id) {
        return axios.delete(`${API_ENDPOINT}/${id}`);
    },
    edit(id) {
        return axios.get(`${API_ENDPOINT}/${id}/edit`);
    },
}

function serializeQuery (req) {
    if (!req.params) return ''

    // Probably server-side, just stringify the object
    if (typeof URLSearchParams === 'undefined') return JSON.stringify(req.params)

    let params = req.params

    const isInstanceOfURLSearchParams = req.params instanceof URLSearchParams

    // Convert to an instance of URLSearchParams so it get serialized the same way
    if (!isInstanceOfURLSearchParams) {
        params = new URLSearchParams()
        Object.keys(req.params).forEach(key => params.append(key, req.params[key]))
    }

    return `?${params.toString()}`
}
