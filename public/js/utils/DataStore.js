// Simple in-memory cache for JSON data
const jsonCache = new Map();

export async function getJSON(path) {
  if (jsonCache.has(path)) {
    return jsonCache.get(path);
  }

  try {
    const response = await fetch(path, { cache: 'default' }); // Use browser cache
    if (!response.ok) {
      throw new Error(`Failed to load ${path}: ${response.status} ${response.statusText}`);
    }
    const data = await response.json();
    jsonCache.set(path, data); // Cache in memory after successful fetch
    return data;
  } catch (error) {
    // console.error(`Error fetching JSON for ${path}:`, error); // Minimal
    throw error;
  }
}

// Simple in-memory cache for Text data (less common to cache text this way)
const textCache = new Map();

export async function getText(path) {
    if (textCache.has(path)) {
        return textCache.get(path);
    }
  try {
    const response = await fetch(path, { cache: 'default' });
    if (!response.ok) {
      throw new Error(`Failed to load ${path}: ${response.status} ${response.statusText}`);
    }
    const data = await response.text();
    textCache.set(path, data);
    return data;
  } catch (error) {
    // console.error(`Error fetching text for ${path}:`, error); // Minimal
    throw error;
  }
}