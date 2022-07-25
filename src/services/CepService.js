import api from "./Api";

class CepService {
  constructor() {
    this.api = api;
  }
  async getCep(cep) {
    const response = await api.get(`${cep}/json`);
    const data = response.data;
    return data;
  }
}

export default CepService;
