import axios from 'axios';

class HttpService {
  constructor() {
    this.http = axios.create({
      baseURL: 'http://localhost:8000/api/v1/',
    });
  }
}

export default HttpService;
