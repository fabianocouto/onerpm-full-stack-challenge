import { Artist } from "./Artist";

export type Album = {
  id: number;
  cover_image_url: string;
  title: string;
  release_date: string;
  is_available_in_br_market: boolean;
  spotify_album_id: string;
  spotify_album_url: string;
  artists: Artist[];
}