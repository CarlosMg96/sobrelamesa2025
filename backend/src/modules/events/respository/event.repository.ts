import { Event } from "../interfaces/event";

export interface EventRepository{
    getListEvents(data: Array): Promise<Event | null>;
    getEvent(event_id: Number): Promise<Event | null>;
    createEvent(data: Array): Promise<Event | null>;
    updateEvent(data: Array): Promise<Event | null>;
    deleteEvent(event_id: Number): Promise<Event | null>;
}