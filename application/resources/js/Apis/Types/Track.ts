import { Album } from "./Album";
import { Artist } from "./Artist";
import { Isrc } from "./Isrc";

export type Track = {
  id: number;
  title: string;
  release_date: string;
  duration_ms: number;
  is_available_in_br_market: boolean;
  spotify_track_id: string;
  spotify_track_url: string;
  isrc: Isrc;
  album: Album;
  artists: Artist[];
}