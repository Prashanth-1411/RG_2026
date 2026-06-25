export interface NavbarItem {
  id: number;
  menu_name: string;
  menu_link: string;
  order: number;
  label: string;
  link: string;
  sort_order: number;
}

export interface SliderItem {
  id: number;
  image: string;
  title: string;
  description: string;
  button_text: string | null;
  button_link: string | null;
  order: number;
  is_active: boolean | number;
  image_url: string;
  subtitle: string;
  sort_order: number;
}

export interface PageItem {
  id: number;
  page_name: string;
  heading: string;
  content: string;
  image: string | null;
  banner_image: string | null;
}

export interface ServiceItem {
  id: number;
  title: string;
  description: string;
  image: string | null;
  service_type: string;
  status: string;
  order: number;
  image_url: string | null;
  is_active: boolean | number;
  sort_order: number;
}

export interface SiteSettings {
  logo: string | null;
  logo_width: number;
}

export function getMediaUrl(path: string | null | undefined): string {
  if (!path) return '';
  if (path.startsWith('http') || path.startsWith('data:')) return path;
  const base = window.location.origin;
  return `${base}/${path.replace(/^\//, '')}`;
}

export async function getSiteSettings(): Promise<SiteSettings> {
  return { logo: null, logo_width: 96 };
}

export async function getNavbarItems(): Promise<NavbarItem[]> {
  return [];
}

export async function getSliders(): Promise<SliderItem[]> {
  return [];
}

export async function getPages(): Promise<PageItem[]> {
  return [];
}

export async function getPageByName(_name: string): Promise<PageItem | null> {
  return null;
}

export async function getServices(): Promise<ServiceItem[]> {
  return [];
}

export interface TestimonialItem {
  id: number;
  name: string;
  position: string;
  content: string;
  rating: number;
  verification_url: string;
  is_approved: boolean;
  order: number;
  created_at: string;
}

export interface BlogPostItem {
  id: number;
  title: string;
  slug: string;
  content: string;
  featured_image: string | null;
  category: string;
  tags: string;
  meta_title: string;
  meta_description: string;
  status: string;
  created_at: string;
}

export interface LocationItem {
  id: number;
  name: string;
  slug: string;
  description: string;
  content_html: string;
  faqs: { question: string; answer: string }[];
  meta_title: string;
  meta_description: string;
  meta_keywords: string;
  is_active: boolean;
}

export async function getTestimonials(_approvedOnly = true): Promise<TestimonialItem[]> {
  return [];
}

export async function getBlogPosts(_publishedOnly = true): Promise<BlogPostItem[]> {
  return [];
}

export async function getBlogPostBySlug(_slug: string): Promise<BlogPostItem | null> {
  return null;
}

export async function getLocations(_activeOnly = true): Promise<LocationItem[]> {
  return [];
}

export async function getLocationBySlug(_slug: string): Promise<LocationItem | null> {
  return null;
}

export const API_BASE_URL = '';
