import { AxiosResponse } from 'axios';
import { axiosInstance } from '../Config/Axios';
import { ApiResponse } from './Types/ApiResponse';
import { Track } from './Types/Track';

export const getTracks = (): Promise<AxiosResponse<ApiResponse<Track[]>>> => {
  return axiosInstance.get<AxiosResponse<Track[]>>(`/api/track`);
};