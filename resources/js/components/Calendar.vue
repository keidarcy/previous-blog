<template>
	<v-app>
		<v-content>
			<v-row class="fill-height">
				<v-col>
					<v-sheet height="64">
						<v-toolbar
							flat
							color="white"
						>
							<v-btn
								class="mr-4"
								@click="dialog = true"
								dark
							>New Event</v-btn>
							<v-btn
								outlined
								class="mr-4 desktop"
								@click="setToday"
							>Today</v-btn>
							<v-btn
								fab
								text
								small
								@click="prev"
							>
								<v-icon small>mdi-chevron-left</v-icon>
							</v-btn>
							<v-btn
								fab
								text
								small
								@click="next"
							>
								<v-icon small>mdi-chevron-right</v-icon>
							</v-btn>
							<v-toolbar-title class="desktop">{{ title }}</v-toolbar-title>
							<v-spacer></v-spacer>
							<v-menu
								bottom
								right
							>
								<template v-slot:activator="{ on }">
									<v-btn
										outlined
										v-on="on"
									>
										<span>{{ typeToLabel[type] }}</span>
										<v-icon right>mdi-menu-down</v-icon>
									</v-btn>
								</template>
								<v-list>
									<v-list-item @click="type = 'day'">
										<v-list-item-title>Day</v-list-item-title>
									</v-list-item>
									<v-list-item @click="type = 'week'">
										<v-list-item-title>Week</v-list-item-title>
									</v-list-item>
									<v-list-item @click="type = 'month'">
										<v-list-item-title>Month</v-list-item-title>
									</v-list-item>
									<v-list-item @click="type = '4day'">
										<v-list-item-title>4 days</v-list-item-title>
									</v-list-item>
								</v-list>
							</v-menu>
						</v-toolbar>
					</v-sheet>

					<!-- add event dialog -->
					<v-dialog
						v-model="dialog"
						max-width="500"
					>
						<v-card>
							<v-container>
								<v-form @submit.prevent="addEvent">
									<v-text-field
										v-model="name"
										type="text"
										label="event name (required)"
									></v-text-field>
									<v-text-field
										v-model="detail"
										type="text"
										label="detail"
									></v-text-field>

									<v-menu>
										<template v-slot:activator="{ on }">
											<v-text-field
												v-model="start_create"
												label="start (required)"
												type="datetime"
												v-on="on"
											></v-text-field>
										</template>

										<v-date-picker
											v-model="new_start_date"
											color="green lighten-1"
										></v-date-picker>
										<v-time-picker
											v-model="new_start_time"
											:landscape="$vuetify.breakpoint.smAndUp"
											ampm-in-title
										>
										</v-time-picker>
									</v-menu>

									<v-menu>
										<template v-slot:activator="{ on }">
											<v-text-field
												v-model="end_create"
												label="end (required)"
												type="datetime"
												v-on="on"
											></v-text-field>
										</template>
										<v-date-picker
											v-model="new_end_date"
											color="green lighten-1"
										></v-date-picker>
										<v-time-picker
											v-model="new_end_time"
											:landscape="$vuetify.breakpoint.smAndUp"
											ampm-in-title
										>
										</v-time-picker>
									</v-menu>

									<v-menu>
										<template v-slot:activator="{ on }">
											<v-text-field
												v-model="color"
												label="color (click to open color menu)"
												v-on="on"
											></v-text-field>
										</template>
										<v-color-picker
											class="ma-2"
											v-model="color"
											hide-inputs
										></v-color-picker>
									</v-menu>
									<v-btn
										type="submit"
										color="primary"
										class="mr-4"
										@click.stop="dialog=false"
									>Create</v-btn>
								</v-form>
							</v-container>
						</v-card>
					</v-dialog>
					<v-sheet height="600">
						<v-calendar
							ref="calendar"
							v-model="focus"
							color="primary"
							:events="events"
							:event-color="getEventColor"
							:event-margin-bottom="3"
							:now="today"
							:type="type"
							@click:event="showEvent"
							@click:more="viewDay"
							@click:date="viewDay"
							@change="updateRange"
						></v-calendar>
						<v-menu
							v-model="selectedOpen"
							:close-on-content-click="false"
							:activator="selectedElement"
							offset-x
						>
							<v-card
								color="grey lighten-4"
								min-width="350px"
								flat
							>
								<v-toolbar
									:color="selectedEvent.color"
									dark
								>
									<v-btn
										@click="deleteEvent(selectedEvent.id)"
										icon
									>
										<v-icon>mdi-delete</v-icon>
									</v-btn>
									<v-form v-if="currentlyEditing !== selectedEvent.id">
										<v-toolbar-title @click.prevent="editEvent(selectedEvent)">{{ selectedEvent.name }}
										</v-toolbar-title>
									</v-form>
									<v-form v-else>
										<v-text-field
											v-model="selectedEvent.name"
											type="text"
										></v-text-field>
									</v-form>
									<v-spacer></v-spacer>
								</v-toolbar>
								<v-card-text>
									<form
										v-if="currentlyEditing !== selectedEvent.id"
										@click.prevent="editEvent(selectedEvent)"
									>{{ selectedEvent.detail }}</form>
									<form v-else>
										<textarea-autosize
											v-model="selectedEvent.detail"
											type="text"
											style="width:100%"
											:min-height="100"
											placeholder="add note"
										></textarea-autosize>

										<v-menu>
											<template v-slot:activator="{ on }">
												<v-text-field
													v-model="selectedEvent.start"
													label="start date"
													type="datetime"
													v-on="on"
												></v-text-field>
											</template>

											<v-time-picker
												v-model="start_time"
												:landscape="$vuetify.breakpoint.smAndUp"
												ampm-in-title
											>
											</v-time-picker>

											<v-date-picker
												v-model="start_date"
												class="ml-3"
												no-title
											>
											</v-date-picker>
										</v-menu>

										<v-menu>
											<template v-slot:activator="{ on }">
												<v-text-field
													v-model="selectedEvent.end"
													label="end date"
													type="datetime"
													v-on="on"
												></v-text-field>
											</template>

											<v-time-picker
												v-model="end_time"
												:landscape="$vuetify.breakpoint.smAndUp"
												ampm-in-title
											>
											</v-time-picker>

											<v-date-picker
												v-model="end_date"
												class="ml-3"
												no-title
											>
											</v-date-picker>
										</v-menu>

									</form>
								</v-card-text>
								<v-card-actions>
									<v-btn
										text
										color="secondary"
										@click="selectedOpen = false"
									>Close</v-btn>
									<v-btn
										text
										v-if="currentlyEditing !== selectedEvent.id"
										@click.prevent="editEvent(selectedEvent)"
									>Edit</v-btn>
									<v-btn
										text
										v-else
										@click.prevent="updateEvent(selectedEvent)"
									>Save</v-btn>
								</v-card-actions>
							</v-card>
						</v-menu>
					</v-sheet>
				</v-col>
			</v-row>
		</v-content>
	</v-app>
</template>

<script>
import { db } from '../app.js';
export default {
	data: () => ({
		today: new Date().toISOString().substr(0, 10),
		focus: new Date().toISOString().substr(0, 10),
		type: 'month',
		typeToLabel: {
			month: 'Month',
			week: 'Week',
			day: 'Day',
			'4day': '4 Days',
		},
		name: null,
		detail: null,
		color: '',
		currentlyEditing: null,
		selectedEvent: {},
		selectedElement: null,
		selectedOpen: false,
		events: [],
		dialog: false,
		new_start_date: '',
		new_start_time: '',
		new_end_date: '',
		new_end_time: '',
	}),
	computed: {
		title() {
			const { start, end } = this;
			if (!start || !end) {
				return '';
			}

			const startMonth = this.monthFormatter(start);
			const endMonth = this.monthFormatter(end);
			const suffixMonth = startMonth === endMonth ? '' : endMonth;

			const startYear = start.year;
			const endYear = end.year;
			const suffixYear = startYear === endYear ? '' : endYear;

			const startDay = start.day + this.nth(start.day);
			const endDay = end.day + this.nth(end.day);

			switch (this.type) {
				case 'month':
					return `${startMonth} ${startYear}`;
				case 'week':
				case '4day':
					return `${startMonth} ${startDay} ${startYear} - ${suffixMonth} ${endDay} ${suffixYear}`;
				case 'day':
					return `${startMonth} ${startDay} ${startYear}`;
			}
			return '';
		},
		monthFormatter() {
			return this.$refs.calendar.getFormatter({
				timeZone: 'UTC',
				month: 'long',
			});
		},
		start_date: {
			get() {
				return this.selectedEvent.start.split(' ')[0];
			},
			set(val) {
				this.selectedEvent.start = val;
			},
		},
		start_time: {
			get() {
				return this.selectedEvent.start.split(' ')[1];
			},
			set(val) {
				this.selectedEvent.start = this.selectedEvent.start.split(' ')[0] + ' ' + val;
			},
		},
		end_date: {
			get() {
				return this.selectedEvent.end.split(' ')[0];
			},
			set(val) {
				this.selectedEvent.end = val;
			},
		},
		end_time: {
			get() {
				return this.selectedEvent.end.split(' ')[1];
			},
			set(val) {
				this.selectedEvent.end = this.selectedEvent.end.split(' ')[0] + ' ' + val;
			},
		},
		start_create() {
			return this.new_start_date + ' ' + this.new_start_time;
		},
		end_create() {
			return this.new_end_date + ' ' + this.new_end_time;
		},
	},
	mounted() {
		this.getEvents();
	},
	methods: {
		async getEvents() {
			let snapshot = await db.collection('calEvent').get();
			let events = [];
			snapshot.forEach(doc => {
				let appData = doc.data();
				appData.id = doc.id;
				events.push(appData);
			});
			this.events = events;
		},
		async updateEvent(event) {
			await db
				.collection('calEvent')
				.doc(this.currentlyEditing)
				.update({
					detail: event.detail,
					name: event.name,
					start: event.start,
					end: event.end,
				});
			this.selectedOpen = false;
			this.currentlyEditing = null;
		},
		async deleteEvent(event) {
			await db
				.collection('calEvent')
				.doc(event)
				.delete();
			this.selectedOpen = false;
			this.getEvents();
		},
		async addEvent() {
			if (this.name && this.start_create && this.end_create) {
				await db.collection('calEvent').add({
					name: this.name,
					detail: this.detail,
					start: this.start_create,
					end: this.end_create,
					color: this.color,
				});
				this.name = '';
				this.detail = '';
				this.start = '';
				this.end = '';
				this.color = '';
				this.getEvents();
			} else {
				alert('invalide');
			}
		},
		viewDay({ date }) {
			(this.focus = date), (this.type = 'day');
		},
		getEventColor(event) {
			return event.color;
		},
		setToday() {
			this.focus = this.today;
		},
		prev() {
			this.$refs.calendar.prev();
		},
		next() {
			this.$refs.calendar.next();
		},
		editEvent(event) {
			this.currentlyEditing = event.id;
		},
		showEvent({ nativeEvent, event }) {
			const open = () => {
				this.selectedEvent = event;
				this.selectedElement = nativeEvent.target;
				setTimeout(() => (this.selectedOpen = true), 10);
			};

			if (this.selectedOpen) {
				this.selectedOpen = false;
				setTimeout(open, 10);
			} else {
				open();
			}

			nativeEvent.stopPropagation();
		},
		updateRange({ start, end }) {
			this.start = start;
			this.end = end;
		},
		nth(d) {
			return d > 3 && d < 21
				? 'th'
				: ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'][d % 10];
		},
	},
};
</script>
