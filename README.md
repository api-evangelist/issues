# Issues (issues)
An index and topic collection covering issue tracking, bug tracking, and project-management APIs that expose issue, ticket, task, and work-item primitives. Issue tracking APIs are the connective tissue between engineering, product, and operations work — they capture defects, feature requests, user stories, and tasks, then move them through configurable workflows from creation to resolution. This collection includes developer-centric trackers like Jira, Linear, GitHub Issues, and GitLab Issues; project- and work-management platforms like Asana, ClickUp, Monday.com, Trello, and Wrike; product-discovery trackers like Productboard and Shortcut; classic open-source bug trackers like Redmine; and flexible work-item stores like Notion, Airtable, and Smartsheet. It is distinct from the customer-support topic (Zendesk-style help desks) and from incident management (which lives under monitoring).

**URL:** [https://apievangelist.com](https://apievangelist.com)

**Run:** [Capabilities Using Naftiko](https://github.com/naftiko/fleet?utm_source=api-evangelist&utm_medium=readme&utm_campaign=company-api-evangelist&utm_content=repo)

## Tags:

 - Issue Tracking, Bug Tracking, Project Management, Task Management, Work Management

## Timestamps

- **Created:** 2026-05-19
- **Modified:** 2026-05-19

## Common Properties

- [Portal](https://apievangelist.com)
- [GitHubOrganization](https://github.com/api-evangelist)
- [JSONSchema - Issue Schema](https://raw.githubusercontent.com/api-evangelist/issues/refs/heads/main/json-schema/issues-issue-schema.json)
- [JSONSchema - Comment Schema](https://raw.githubusercontent.com/api-evangelist/issues/refs/heads/main/json-schema/issues-comment-schema.json)
- [JSON-LD](https://raw.githubusercontent.com/api-evangelist/issues/refs/heads/main/json-ld/issues-context.jsonld)
- [Vocabulary](https://raw.githubusercontent.com/api-evangelist/issues/refs/heads/main/vocabulary/issues-vocabulary.yaml)

## Features

| Name | Description |
|------|-------------|
| Issue and Ticket Primitives | Issue tracking APIs expose a core issue/ticket primitive with identifier, title, description, status, assignee, reporter, priority, and timestamps as the unit of work that flows through development and project workflows. |
| Configurable Workflows and Transitions | Trackers like Jira, Linear, and Azure DevOps model state machines on top of issues — open, in-progress, in-review, done — and expose transition APIs that move work between states with optional validations and side effects. |
| Labels, Components, and Custom Fields | Issue APIs let teams classify work using labels, tags, components, fix versions, epics, and arbitrary custom fields, which are first-class resources that can be created, listed, and assigned via the API. |
| Comments and Activity Streams | Issues accumulate conversation and history. Most trackers expose comments as a separate resource and provide an audit-style activity stream covering field changes, transitions, and attachments. |
| Sprints, Boards, and Backlogs | Agile-oriented APIs (Jira Agile, Linear, Shortcut, Azure Boards) expose sprints, iterations, kanban boards, and backlogs as objects you can query and mutate alongside the underlying issues. |
| Webhooks and Event Subscriptions | Issue trackers publish events (created, updated, transitioned, commented) over webhooks so external automations, chatops bots, CI systems, and AI agents can react to work-item changes in near real time. |
| Search, JQL, and Saved Queries | Trackers expose query languages or filter parameters (Jira's JQL, GitHub's search syntax, Linear's filter API) for finding issues by status, assignee, label, sprint, or arbitrary custom-field combinations. |
| Attachments and Linked Resources | Issues support file attachments and relationships to other issues (blocks, blocked-by, duplicates, relates-to) and to external artifacts like commits, pull requests, deploys, and design files. |

## Use Cases

| Name | Description |
|------|-------------|
| Engineering Issue Tracking | Software teams use Jira, Linear, GitHub Issues, or GitLab Issues as the system of record for bugs, stories, and tasks, with API integrations into IDEs, CI/CD pipelines, and code review tools. |
| Cross-Team Work Coordination | Work-management platforms like Asana, ClickUp, Monday.com, and Wrike coordinate tasks across engineering, marketing, design, and operations, often syncing with developer trackers via API. |
| Product Roadmap and Discovery | Productboard, Shortcut, and Linear connect customer feedback and product opportunities to issues and roadmap items, exposing APIs for ingesting feedback and synchronizing with engineering work. |
| ChatOps and Bot Automation | Slack, Microsoft Teams, and Discord bots create, update, transition, and comment on issues using tracker APIs — turning chat messages into tickets and pushing status updates back into channels. |
| AI Agent Triage and Routing | AI agents use issue tracker APIs to classify incoming issues, suggest labels and assignees, summarize threads, draft replies, link related tickets, and propose status transitions for human review. |
| Reporting, Dashboards, and Analytics | BI tools and dashboards pull cycle time, throughput, lead time, and backlog metrics from issue tracker APIs to measure engineering productivity and project health. |
| Internal Developer Portals | Backstage, Compass, and other internal developer portals embed issue tracker data alongside services, deployments, and ownership so teams see open issues for the components they own. |

## Integrations

| Name | Description |
|------|-------------|
| Jira | Atlassian's market-leading issue and project tracker for software teams, with a deep REST API covering issues, projects, sprints, JQL search, custom fields, and webhooks. |
| Linear | Modern, opinionated issue tracker for high-velocity software teams, with a first-class GraphQL API for issues, cycles, projects, and roadmaps. |
| GitHub Issues | Lightweight tracker built into GitHub repositories, accessible through the GitHub REST and GraphQL APIs alongside pull requests, commits, and Actions. |
| GitLab Issues | Issue tracker tightly integrated with GitLab repositories, CI/CD, and merge requests, exposed via the GitLab REST and GraphQL APIs. |
| Asana | Work-management platform with tasks, projects, sections, and custom fields, exposed via the Asana REST API and frequently used as a cross-functional issue tracker. |
| ClickUp | All-in-one work-management platform with tasks, lists, spaces, and views, accessible through the ClickUp REST API. |
| Monday.com | Visual work-management platform with boards, items, and columns, accessible through the Monday GraphQL API and widely used as a task and issue tracker. |
| Azure DevOps | Microsoft's developer platform whose Boards service provides work-item tracking (bugs, user stories, tasks, epics) via the Azure DevOps REST API. |

## Artifacts

Machine-readable API specifications organized by format.

### JSON Schema

- [Issue Schema](json-schema/issues-issue-schema.json)
- [Comment Schema](json-schema/issues-comment-schema.json)

### JSON Structure

- [Issue Structure](json-structure/issues-issue-structure.json)
- [Comment Structure](json-structure/issues-comment-structure.json)

### JSON-LD

- [Issues Context](json-ld/issues-context.jsonld)

## Vocabulary

- [Issues Vocabulary](vocabulary/issues-vocabulary.yaml) — Unified taxonomy mapping 6 resources, 9 actions, 4 workflows, and 4 personas across issue trackers, bug trackers, and project-management platforms

## Network

This index references the following issue tracking and project-management repositories:

- [Airtable](https://github.com/api-evangelist/airtable)
- [Asana](https://github.com/api-evangelist/asana)
- [Atlassian](https://github.com/api-evangelist/atlassian)
- [Atlassian Compass](https://github.com/api-evangelist/atlassian-compass)
- [Atlassian Jira](https://github.com/api-evangelist/atlassian-jira)
- [Azure DevOps](https://github.com/api-evangelist/azure-devops)
- [Basecamp](https://github.com/api-evangelist/basecamp)
- [Bitbucket](https://github.com/api-evangelist/bitbucket)
- [ClickUp](https://github.com/api-evangelist/clickup)
- [Gitea](https://github.com/api-evangelist/gitea)
- [GitHub](https://github.com/api-evangelist/github)
- [GitLab](https://github.com/api-evangelist/gitlab)
- [Hive](https://github.com/api-evangelist/hive)
- [Jira](https://github.com/api-evangelist/jira)
- [Linear](https://github.com/api-evangelist/linear)
- [Microsoft Project](https://github.com/api-evangelist/microsoft-project)
- [Monday.com](https://github.com/api-evangelist/monday-com)
- [Notion](https://github.com/api-evangelist/notion)
- [Productboard](https://github.com/api-evangelist/productboard)
- [Redmine](https://github.com/api-evangelist/redmine)
- [Shortcut](https://github.com/api-evangelist/shortcut)
- [Smartsheet](https://github.com/api-evangelist/smartsheet)
- [Teamwork](https://github.com/api-evangelist/teamwork)
- [Trello](https://github.com/api-evangelist/trello)
- [Wrike](https://github.com/api-evangelist/wrike)
- [Zoho](https://github.com/api-evangelist/zoho)

## Maintainers

**FN:** Kin Lane

**Email:** kin@apievangelist.com
