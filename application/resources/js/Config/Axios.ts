import axios from 'axios';

/**
 * @todo: put baseURL in .env file
 */
export const axiosInstance = axios.create({
  baseURL: 'http://localhost',
  headers: {
    'Content-Type': 'application/json',
  },
});