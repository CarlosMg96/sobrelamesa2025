import { EventRepository } from "./event.repository";
import { Event } from "../interfaces/event";
import { db } from "../../../config/database";
import { RowDataPacket } from "mysql2";

export class EventsMySQLRepository implements EventRepository {
    async getListEvents(data: Array<any>): Promise<Event | null> {
        const sql = `
            SELECT * FROM eventos LIMIT ${data.limit}`;

            try {
                const [rows] = await db.query(sql);
                const row = Array.isArray(rows) && rows.length ? rows : null;
                if(!row){
                    return null
                }
                const result: Event = { 
                    id: (row as any).id
                }

                return result;
            } catch (error) {
                console.error('Error in getListEvents', error)
            }
    }

    async createEvent(data: Array<any>): Promise<Event | null> {
        return data;
    }

    async updateEvent(data: Array<any>): Promise<Event | null> {
        return data;
    }

    async deleteEvent(event_id: Number): Promise<Event | null> {
        return [];
    }

    async getEvent(event_id: Number): Promise<Event | null> {
        return [];

    }

}
