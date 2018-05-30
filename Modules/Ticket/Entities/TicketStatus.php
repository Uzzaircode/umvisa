<?php
namespace Modules\Ticket\Entities;

class TicketStatus
{
    const DRAFT = 1;
    const SUBMITTED_TO_HOD = 2;
    const APPROVED_BY_HOD = 3;
    const REJECTED_BY_HOD = 4;
    const SUBMITTED_TO_DASAR = 5;
    const APPROVED_BY_DASAR = 6;
    const REJECTED_BY_DASAR = 7;
    const SUBMITTED_TO_PTM = 8;
    const APPROVED_BY_PTM = 9;
    const REJECTED_BY_PTM =10;
    const READ_BY_HOD = 11;
    const READ_BY_DASAR = 12;
    const READ_BY_PTM = 13;
    const ASSIGNED = 99;
}
