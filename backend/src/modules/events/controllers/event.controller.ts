import { Request, Response } from "express";
import { EventService } from "../services/event.service";
import { sendResponse } from "../../../core/response";

export class EventController {
    constructor(private readonly service: EventService) { }

    async getListEvents(req: Request, res: Response) {
        let { pageNumber, pageLength } = req.query;
        if (!pageNumber || !pageLength) {
            pageNumber = "100";
            pageLength = "100";
        }
        const result = await this.service.getListEvents(Number(pageNumber), Number(pageLength));
        return sendResponse(res, 200, "Events list", result);
    }

    async getEventById(req: Request, res: Response) {
        const { id } = req.params;
        if (!id) {
            return sendResponse(res, 400, "Missing query parameters");
        }
        const result = await this.service.getEventById(Number(id));
        return sendResponse(res, 200, "Event", result);
    }

    async createEvent(req: Request, res: Response) {
        const { data } = req.body;
        if (!data) {
            return sendResponse(res, 400, "Missing query parameters");
        }
        const result = await this.service.createEvent(data);
        return sendResponse(res, 200, "Event created", result);
    }

    // async updateEvent(req: Request, res: Response) {
    //     const { id } = req.params;
    //     const { data } = req.body;
    //     const result = await this.service.updateEvent(Number(id), data);
    //     return res.json(result);
    // }

    async deleteEvent(req: Request, res: Response) {
        const { id } = req.params;
        if (!id) {
            return sendResponse(res, 400, "Missing query parameters");
        }
        const result = await this.service.deleteEvent(Number(id));
        return sendResponse(res, 200, "Event deleted", result);
    }
}