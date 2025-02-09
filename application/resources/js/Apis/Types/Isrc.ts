import { IsrcStatus } from "./IsrcStatus";

export type Isrc = {
  id: number;
  code: string;
  isrc_status: IsrcStatus;
}
